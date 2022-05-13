<?php

namespace App\Orchid\Layouts;

use App\Constants;
use App\Models\Post;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostListLayout extends Table
{
    /**
     * Data source.
     * The target property indicates the key will be the source for our table on the screen.
     * @var string
     */
    public $target = Constants::POST_DATASOURCE_KEY;

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            /*
            TD::make('title', 'Title')
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.post.edit', $post);
                }),
            */

            // Filtering will be performed by sql with like filtering.
            // In order for the search to be case-insensitive, you need to check the database encoding.
            // See: https://orchid.software/en/docs/filters/
            TD::make('title')
                ->sort()
                ->filter(Input::make())
                ->render(function (Post $post) {
                    return Link::make($post->title)->route('platform.post.edit', $post);
                }),

            TD::make('created_at', 'Created')
                ->sort(),

            TD::make('updated_at', 'Last edit')
                ->sort(),
        ];
    }
}
