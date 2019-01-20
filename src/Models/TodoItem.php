<?php

namespace Todo;

class TodoItem extends Model 
{
    // This is used by the abstract model, don't touch
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch


    // Creates a new todo
    public static function createTodo($title) {  
        $query = "INSERT INTO todos (title, created) VALUES ('$title', now());";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }

    // Updates a specific todo
    public static function updateTodo($todoId, $title, $completed = null) {
        $query = "UPDATE todos SET title='$title', completed='$completed' WHERE id='$todoId';";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }

    // Deletes a specific todo
    public static function deleteTodo($todoId) {
        $query = "DELETE FROM todos WHERE id ='$todoId';";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }
    
    
    // (Optional bonus methods below)

    // This is to toggle all todos either as completed or not completed
    /*public static function toggleTodos($completed){
    }*/

    // This is to delete all the completed todos from the database
    public static function clearCompleted(){
        $query = "DELETE  FROM " . static::TABLENAME . " WHERE completed = 'true'";
        static::$db->query($query);
        $results = static::$db->execute();

        return $results;
    }

}
