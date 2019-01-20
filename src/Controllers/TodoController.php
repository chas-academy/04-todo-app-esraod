<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller {
    
    public function get() {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add() {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
          $this->redirect('/');
        }
    }

    public function update($urlParams) {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $completed = isset($body['status']) ? 'true' : 'false'; // whether or not the todo has been checked or not

        $result = TodoItem::updateTodo($todoId, $body['title'], $completed);

        if ($result) {
          $this->redirect('/');
        } else {
            throw new \Exception('Something went wrong while trying to update');
        }

    }
        public function delete($urlParams) {    
          $result = TodoItem::deleteTodo($urlParams['id']);
          
          if ($result) {
            $this->redirect('/');
        }
    }


    // OPTIONAL Bonus round! The two methods below are optional


    // (OPTIONAL) This action toggles all todos to completed, or not completed.
   /* public function toggle(){
    }*/

    // (OPTIONAL) This action removes all completed todos from the table.
    public function clear() {

        $result = TodoItem::clearCompleted();
        if ($result) {
            $this->redirect('/');
        }
    }
}