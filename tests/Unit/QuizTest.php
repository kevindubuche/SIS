<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuizRepository;
class QuizTest extends TestCase
{
    
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }

    public function test_it_can_store_a_quiz()
    {
        $data = [
            'titre' => 'hhj',
            'class_id' => 1,
            'duree' => 2,
            'categorie' => 'hkjhhgggghj',
            'nombre_questions' => 4,
        ];

        $quizRepo = new QuizRepository;
        $quiz = $quizRepo->create($data);
      
        $this->assertInstanceOf(Quiz::class, $quiz);
        $this->assertEquals($data['titre'], $quiz->titre);
        $this->assertEquals($data['class_id'], $quiz->class_id);
        $this->assertEquals($data['duree'], $quiz->duree);
        $this->assertEquals($data['categorie'], $quiz->categorie);
        $this->assertEquals($data['nombre_questions'], $quiz->nombre_questions);

        $this->assertTrue(isset($quiz->quiz_id));
    }
}
