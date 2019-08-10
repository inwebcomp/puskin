<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Article;
use App\Models\Category;
use App\Models\Metadata;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Article
            ::events()
            ->published()
            ->latest()
            ->withTranslation()
            ->with('images');

        [$year, $month] = $this->applyDateFilters($events, $request);
        $category = $this->applyCategoryFilters($events, $request);

        $events = $events->paginate(10);

        $categories = Category::query()
                              ->events()
                              ->published()
                              ->ordered()
                              ->withTranslation()
                              ->get();

        $archive = $this->archive();

        $activeFilters = $request->only(['category', 'date']);

        return view('pages.events', [
            'pageType'      => 'events',
            'breadcrumbs'   => [Breadcrumbs::events()],
            'events'        => $events,
            'categories'    => $categories,
            'category'      => $category,
            'archive'       => $archive,
            'activeFilters' => $activeFilters,
            'title'         => $this->formatTitle($category, $year, $month),
            'meta'          => Metadata::fromPage('events'),
        ]);
    }

    public function show(Request $request, $article)
    {
        $article = Article::events()->findBySlug($article)->published()->firstOrFail();

        if ($request->getMethod() == 'POST') {
            $controller = new FormController();
            $data = $controller->callAction('comment', [$request, $article]);
        } else {
            $data = [];
        }

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
     * @param string $column
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
            Article::events()
                   ->selectRaw('count(*) as count, DATE_FORMAT(created_at, "%Y-%m-01") as date')
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

    private function applyCategoryFilters(Builder $query, $request)
    {
        $category = $request->input('category');

        if (! $category)
            return null;

        $category = Category::findBySlug($category)->news()->firstOrFail();

        $query->where('category_id', '=', $category->id);

        return $category;
    }

    private function formatTitle($category, $year, $month)
    {
        $title = __('Мероприятия лицея');

        $date = Carbon::createFromDate($year, $month, 1);

        if ($month or $year) {
            $title .= ' ' . __('за');

            if ($month)
                $title .= ' ' . $date->monthName;
            if ($year)
                $title .= ' ' . $date->year . ' ' . ($month ? __('года') : __('год'));
        }

        if ($category) {
            $title .= ' ' . __('в рубрике') . ' «‎' . $category->title . '»';
        }

        return $title;
    }
}
