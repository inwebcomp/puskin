<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = Article
            ::news()
            ->published()
            ->latest()
            ->withTranslation()
            ->with('images');

        [$year, $month] = $this->applyDateFilters($news, $request);

        $news = $news->paginate(10);

        $archive = $this->archive();

        return view('pages.news', [
            'pageType'    => 'news',
            'breadcrumbs' => [Breadcrumbs::news()],
            'news'        => $news,
            'archive'     => $archive,
            'title'       => $this->formatTitle($year, $month),
        ]);
    }

    public function show($article)
    {
        $article = Article::news()->findBySlug($article)->firstOrFail();

        return view('pages.page', [
            'page'        => $article,
            'pageType'    => 'article',
            'breadcrumbs' => Breadcrumbs::article($article),
        ]);
    }

    protected function mb_ucfirst($string, $encoding = 'utf-8')
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    /**
     * Chunk the underlying collection array by column.
     *
     * @param Collection $array
     * @param string     $column
     * @return Collection
     */
    protected function chunkBy(Collection $array, $column)
    {
        $chunks = [];

        foreach ($array as $element) {
            $chunks[$element[$column]][] = $element;
        }

        $class = get_class($array);

        return new $class($chunks);
    }

    private function archive()
    {
        return $this->chunkBy(
            Article::selectRaw('count(*) as count, DATE_FORMAT(created_at, "%Y-%m-01") as date')
                ->groupBy('date')
                ->published()
                ->get()
                ->map(function ($data) {
                    $date = Carbon::parse($data->getOriginal('date'));

                    return [
                        'title' => $this->mb_ucfirst($date->monthName) . ' ' . $date->year,
                        'year'  => $date->year,
                        'query' => $date->format('m-Y'),
                        'count' => $data->count,
                    ];
                })
            , 'year');
    }

    private function applyDateFilters(Builder $query, $request)
    {
        $date = $request->input('date');

        $parts = explode('-', $date);

        $year = $month = null;

        if (count($parts) == 1) {
            $year = strlen($parts[0]) == 4 ? $parts[0] : null;
        } else if (count($parts) == 2) {
            $year = strlen($parts[1]) == 4 ? $parts[1] : null;
            $month = strlen($parts[0]) == 2 ? $parts[0] : null;
        }

        if ($year) {
            $query->whereYear('created_at', '=', $year);
        }

        if ($month) {
            $query->whereMonth('created_at', '=', $month);
        }

        return [$year, $month];
    }

    private function formatTitle($year, $month)
    {
        $title = __('Новости лицея');

        $date = Carbon::createFromDate($year, $month, 1);

        if ($month or $year) {
            $title .=  ' ' . __('за');

            if ($month)
                $title .=  ' ' . $date->monthName;
            if ($year)
                $title .=  ' ' . $date->year . ' ' . ($month ? __('года') : __('год'));
        }

        return $title;
    }
}
