<?php

namespace Database\Seeders;

use App\Models\Crew;
use App\Models\CrewMovie;
use App\Models\Favorite;
use App\Models\Intro;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use App\Models\UserMovie;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         `name`, `email`, `email_verified_at`, `password`,
        $user=new User();
        $user->name='dina';
        $user->email='dinashadiakeela@gmail.com';
        $user->password=bcrypt('123456');
        $user->save();


//        `imdbid`, `image`, `name`, `bio`, `year`, `languages`, `country`, `director`, `writer`, `producer`, `cast`, `mpaa`, `url`
        $movie=new Movie();
        $movie->imdbid='dina';
        $movie->image='https://www.imdb.com/title/tt3420504/mediaviewer/rm3492212737/?ref_=tt_ov_i';
        $movie->name='Finch';
        $movie->bio="On a post-apocalyptic earth, a robot, built to protect the life of his creator's beloved dog, learns about life, love, friendship and what it means to be human.";
        $movie->year=2021;
        $movie->languages='English';
        $movie->country='Australia, India';
        $movie->director='Miguel Sapochnik';
        $movie->writer='Craig Luck , Ivor Powell';
        $movie->producer='Ivor';
        $movie->url='https://www.imdb.com/video/vi1185071897?playlistId=tt3420504&ref_=tt_ov_vi';
        $movie->save();

//        user_id`, `comment`, `movie_id`, `review_id`

        $review=new Review();
        $review->user_id=$user->id;
        $review->comment='good';
        $review->movie_id=$movie->id;
        $review->review_id=1;
        $review->save();

//        `id`, `image`, `bio`,
        $intro=new Intro();
        $intro->image='https://www.imdb.com/title/tt3420504/mediaviewer/rm3492212737/?ref_=tt_ov_i';
        $intro->bio='post-apocalyptic earth, a robot, built to protect the life';
        $intro->save();

//        `name`, `job`, `image`
        $crew=new Crew();
        $crew->name='Eman';
        $crew->job='actor';
        $crew->image='https://www.imdb.com/title/tt3420504/mediaviewer/rm3492212737/?ref_=tt_ov_i';
        $crew->save();


//        `user_id`, `movie_id`
        $favorite=new Favorite();
        $favorite->user_id=$user->id;
        $favorite->movie_id=$movie->id;
        $favorite->save();

        //     `user_id`, `movie_id`
        $user_movies=new UserMovie();
        $user_movies->user_id=$user->id;
        $user_movies->movie_id=$movie->id;
        $user_movies->save();

        //     `crew_id`, `movie_id`
        $crew_movies=new CrewMovie();
        $crew_movies->crew_id=$crew->id;
        $crew_movies->movie_id=$movie->id;
        $crew_movies->save();

    }
}
