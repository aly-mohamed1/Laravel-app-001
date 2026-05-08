<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\ReactionType;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 0;

        while ($i < 50) {

            $user_id = User::inRandomOrder('id')->first()->id; 

            $reaction_type_id = ReactionType::all()->random()->id;

            $reactable_type = fake()->randomElement(['App\Models\Post', 'App\Models\Comment', 'App\Models\Reply']);

            // GET $reactable_id: Method A
            // $reactable_id = '';
            // if ($reactable_type === 'App\Models\Post') {
            //     $reactable_id = Post::all()->random()->id;
            // } elseif ($reactable_type === 'App\Models\Comment') {
            //     $reactable_id = Comment::all()->random()->id;
            // } else {
            //     $reactable_id = Reply::all()->random()->id;
            // }

            // GET $reactable_id: Method B
            // $reactable_id = '';
            // switch ($reactable_type) {
            //     case 'App\Models\Post':
            //         $reactable_id = Post::all()->random()->id;
            //         break;
            //     case 'App\Models\Comment':
            //         $reactable_id = Comment::all()->random()->id;
            //         break;
            //     default:
            //         $reactable_id = Reply::all()->random()->id;
            // }

            // GET $reactable_id: Method C
            $reactable_id = match ($reactable_type) {
                'App\Models\Post' => Post::all()->random()->id,
                'App\Models\Comment' => Comment::all()->random()->id,
                default => Reply::all()->random()->id,
            };

            $exists = Reaction::query()
                ->where('user_id',  $user_id)
                ->where('reactable_type',  $reactable_type)
                ->where('reactable_id', $reactable_id)
                ->first();

            if ($exists) {
                continue;
            }

            $created = Reaction::factory()->create([
                'user_id' => $user_id,
                'reaction_type_id' => $reaction_type_id,
                'reactable_type' => $reactable_type,
                'reactable_id' => $reactable_id,
            ]);

            if ($created) {
                $i++;
            }
        }
    }
}
