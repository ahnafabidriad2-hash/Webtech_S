<?php

require_once "../model/book_model.php";

$action = $_POST['action'] ?? $_GET['action'] ?? '';

header('Content-Type: application/json');

if ($action == 'add') {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $status = trim($_POST['status']);

    if ($title == '' || $author == '' || $category == '' || $status == '') {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    $result = addBook($title, $author, $category, $status);

    echo json_encode([
        'success' => $result,
        'message' => $result ? 'Book added successfully!' : 'Failed to add book.'
    ]);
}

elseif ($action == 'read') {
    $books = getAllBooks();

    echo json_encode([
        'success' => true,
        'data' => $books
    ]);
}

elseif ($action == 'getOne') {
    $id = $_GET['id'];
    $book = getBookById($id);

    echo json_encode([
        'success' => $book ? true : false,
        'data' => $book
    ]);
}

elseif ($action == 'update') {
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $status = trim($_POST['status']);

    if ($title == '' || $author == '' || $category == '' || $status == '') {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    $result = updateBook($id, $title, $author, $category, $status);

    echo json_encode([
        'success' => $result,
        'message' => $result ? 'Book updated successfully!' : 'Failed to update book.'
    ]);
}

elseif ($action == 'delete') {
    $id = $_POST['id'];
    $result = deleteBook($id);

    echo json_encode([
        'success' => $result,
        'message' => $result ? 'Book deleted successfully!' : 'Failed to delete book.'
    ]);
}

else {
    echo json_encode([
        'success' => false,
        'message' => 'Unknown action.'
    ]);
}