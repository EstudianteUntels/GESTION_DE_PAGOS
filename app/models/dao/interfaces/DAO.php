<?php 
    interface DAO{
        function update($object);
        function insert($object);
        function delete($key);
        function show();
        function showById($key);
    }
?>