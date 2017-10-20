<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 19/10/17
 * Time: 15:15
 */

class NotationController
{
    public function addNote($userId,$articleId, $note) {
       $notation = Evaluation::addEvaluationToArticle($articleId,$userId,$note);
       header('Location: /');
    }
}