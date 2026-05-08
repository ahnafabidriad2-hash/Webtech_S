<?php

require_once "database.php";

function addBook($title, $author, $category, $status) {
    $conn = connectDatabase();

    $sql = "INSERT INTO books (title, author, category, status) VALUES ('$title', '$author', '$category', '$status')";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return $result;
}

function getAllBooks() {
    $conn = connectDatabase();

    $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");

    $books = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }

    mysqli_close($conn);

    return $books;
}

function getBookById($id) {
    $conn = connectDatabase();

    $result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
    $book = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    return $book;
}

function updateBook($id, $title, $author, $category, $status) {
    $conn = connectDatabase();

    $sql = "UPDATE books 
            SET title='$title', author='$author', category='$category', status='$status' 
            WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return $result;
}

function deleteBook($id) {
    $conn = connectDatabase();

    $result = mysqli_query($conn, "DELETE FROM books WHERE id = $id");

    mysqli_close($conn);

    return $result;
}