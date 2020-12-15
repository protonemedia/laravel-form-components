<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class Post extends Model
{
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
}

class Comment extends Model
{
}

class SelectRelationTest extends TestCase
{
    use InteractsWithDatabase;

    /** @test */
    public function it_shows_the_slot_if_the_options_are_empty()
    {
        $this->setupDatabase();

        $post = Post::create(['content' => 'Content']);

        $commentA = Comment::create(['content' => 'Content A']);
        $commentB = Comment::create(['content' => 'Content B']);
        $commentC = Comment::create(['content' => 'Content C']);

        $post->comments()->sync([$commentA->getKey(), $commentC->getKey()]);

        $options = Comment::get()->pluck('content', 'id');

        Route::get('select-relation', function () use ($post, $options) {
            return view('select-relation')
                ->with('post', $post)
                ->with('options', $options);
        })->middleware('web');

        DB::enableQueryLog();

        $this->visit('/select-relation')
            ->seeElement('option[value="' . $commentA->getKey() . '"]:selected')
            ->seeElement('option[value="' . $commentB->getKey() . '"]:not(:selected)')
            ->seeElement('option[value="' . $commentC->getKey() . '"]:selected');

        // make sure we cache the result for each option element
        $this->assertCount(1, DB::getQueryLog());
    }
}
