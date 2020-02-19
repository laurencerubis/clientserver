<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string("name");
            $table->timestamps();
        });
    }

    
     *//Reverse the migrations.
     
     public function up()
     {
        Schema::create('question', function(blueprint $table){
        $table->increments('id');
       $table->integer('quiz_id')->unsigned()->index();
        $table->string('body');
        $table->timestamps();

        });
    }
    public function up()
    {
        Schema::create('answer', function(blueprint $table){
        $table->increments('id');
        $table->integer('question_id')->unsigned()->index();
        $table ->strming('answer');
        $table ->boolean('is_correct');
        $table ->timestamps();
    
        }); 
    }
    class Quiz extends Model
{
    public function questions() {
        return $this->hasMany(Question::class);
    }
}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="quiz-wrapper">
                    <h1>{{ $question->body }}</h1>
                    {!! Form::open() !!}
                    @foreach($question->answer->shuffle() as $answer)
                    <h3>
                    <div class="form-group">
                        <div class="radio">
                            {{Form::radio('result', $answer->is_correct) }}
                            {{ Form::label('answer', $answer->answer) }}
                        </div>
                    </div>
                    </h3>
                    @endforeach
                    {{Form::submit('Submit answer') }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection