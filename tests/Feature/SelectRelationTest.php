<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use ProtoneMedia\LaravelFormComponents\Tests\TestCase;

class PostBelongsToMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'comment_post', 'post_id', 'comment_id');
    }
}

class PostMorphMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

class PostMorphToMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}

class Comment extends Model
{
}

class SelectRelationTest extends TestCase
{
    use InteractsWithDatabase;

    /** @test */
    public function it_handles_belongs_to_many_relationships()
    {
        $this->setupDatabase();

        $post = PostBelongsToMany::create(['content' => 'Content']);

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

    /** @test */
    public function it_handles_morph_many_relationships()
    {
        $this->setupDatabase();

        $post = PostMorphMany::create(['content' => 'Content']);

        $commentA = $post->comments()->create(['content' => 'Content A']);
        $commentB = Comment::create(['content' => 'Content B']);
        $commentC = $post->comments()->create(['content' => 'Content C']);

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

    /** @test */
    public function it_handles_morph_to_many_relationships()
    {
        $this->setupDatabase();

        $post = PostMorphToMany::create(['content' => 'Content']);

        $commentA = $post->comments()->create(['content' => 'Content A']);
        $commentB = Comment::create(['content' => 'Content B']);
        $commentC = $post->comments()->create(['content' => 'Content C']);

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
