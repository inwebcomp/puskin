<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Translations{
/**
 * App\Translations\NavigationTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\NavigationTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\NavigationTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\NavigationTranslation query()
 */
	class NavigationTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\TextblockTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\TextblockTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\TextblockTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\TextblockTranslation query()
 */
	class TextblockTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\AlbumTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\AlbumTranslation findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\AlbumTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\AlbumTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\AlbumTranslation query()
 */
	class AlbumTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\PageTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\PageTranslation findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\PageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\PageTranslation query()
 */
	class PageTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\MetadataTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\MetadataTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\MetadataTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\MetadataTranslation query()
 */
	class MetadataTranslation extends \Eloquent {}
}

namespace App\Translations{
/**
 * App\Translations\ArticleTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\ArticleTranslation findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\ArticleTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\ArticleTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translations\ArticleTranslation query()
 */
	class ArticleTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Album
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 * @property-read mixed $date
 * @property-read mixed $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translations\AlbumTranslation[] $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album findBySlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album hidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album orderByTranslation($key, $sortmethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album withTranslation()
 */
	class Album extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Article
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 * @property-read mixed $date
 * @property-read mixed $image
 * @property-read \App\Models\Metadata $metadata
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translations\ArticleTranslation[] $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article events()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article findBySlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article hidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article news()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article orderByTranslation($key, $sortmethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article withTranslation()
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Page
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property-read mixed $date
 * @property-read \App\Models\Metadata $metadata
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translations\PageTranslation[] $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page findBySlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page hidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page orderByTranslation($key, $sortmethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page withTranslation()
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Navigation
 *
 * @package App\Models
 * @property string title
 * @property string|null link
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Navigation[] $children
 * @property-read mixed $link
 * @property-read \App\Models\Page $page
 * @property-read \App\Models\Navigation $parent
 * @property-write mixed $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translations\NavigationTranslation[] $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation d()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation hidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation listsTranslations($translationField)
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Models\Navigation newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Models\Navigation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation orderByTranslation($key, $sortmethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation published()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Models\Navigation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Navigation withTranslation()
 */
	class Navigation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Textblock
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translations\TextblockTranslation[] $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock hidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock orderByTranslation($key, $sortmethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Textblock withTranslation()
 */
	class Textblock extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

