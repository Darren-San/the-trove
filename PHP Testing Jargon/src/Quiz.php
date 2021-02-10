<?php

namespace App;

class Quiz
{
  protected array $questions;

  public function addQuestion(Question $question)
  {
    $this->questions[] = $question;
  }

  public function nextQuestion()
  {
    $question = current($this->questions);

    next($this->questions);

    return $question;
  }

  public function questions()
  {
    return $this->questions;
  }

  public function grade()
  {
    foreach ($this->questions as $question) $allAnswered = $question->getAnswer() ? 1 : 0;

    if ($allAnswered == 0) {
      throw new \Exception('A test must not be graded until all questions have been answered');
    }
    
    $correct = count($this->correctlyAnsweredQuestions());
    return ($correct / count($this->questions)) * 100;
  }

  protected function correctlyAnsweredQuestions()
  {
    return array_filter(
      $this->questions,
      fn($question) => $question->solved()
    );
  }

  public function getQuestions()
  {
    return $this->questions;
  }
}
