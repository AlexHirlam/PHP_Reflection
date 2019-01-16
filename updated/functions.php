<?php

function request() {
    return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
}

function register($name, $email)
{
    global $db;
    $ownerId = 0;
    
    try {
        $query = "INSERT INTO People (firstname, lastname, email) VALUES (:firstname, :lastname, :email)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':firstname', $user_name);
        $stmt->bindParam(':lastname', $user_name);
        $stmt->bindParam(':email', $user_email);
        return $stmt->execute();
    } catch (\Exception $e) {
        throw $e;
    }
}


function login($user_id) 
{

}

function getAllUsers() 
{
    global $db;
    
    try {
        $query = "SELECT * FROM People";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        throw $e;
    }
}

function getAllReviews() 
{
    global $db;
    
    try {
        $query = "SELECT * FROM GameReview";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        throw $e;
    }
}

function getReview($review_id) 
{
    global $db;
    
    try {
        $query = "SELECT * FROM GameReview WHERE review_id = ?";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $review_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        throw $e;
    }
}


function addReview($gametitle, $review_description, $overall_rating) 
{
    global $db;
    
        try {
            $query = "INSERT INTO GameReview ( gametitle, review_description, overall_rating ) VALUES (:gametitle, :review_description, :overall_rating )";
            $stmt = $db->prepare($query);           
            $stmt->bindParam(':gametitle', $gametitle);
            $stmt->bindParam(':review_description', $review_description);
            $stmt->bindParam(':overall_rating', $overall_rating);
            return $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
}


function editReview($review_ID, $gametitle, $review_description, $overall_rating)
{
    global $db;
    
    try {
        $query = "UPDATE GameReview SET gametitle=:gametitle, review_description=:review_description, overall_rating=:overall_rating WHERE review_ID=:review_ID";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':gametitle', $gametitle);
        $stmt->bindParam(':review_description', $review_description);
        $stmt->bindParam(':overall_rating', $overall_rating);
        $stmt->bindParam(':review_ID', $review_ID);
        return $stmt->execute();
    } catch (\Exception $e) {
        throw $e;
    }
}

function vote($review_id, $score) {
    global $db;
    $userId = 0;
    
    try {
        $query = 'INSERT INTO votes (book_id, user_id, value) VALUES (:bookId, :userId, :score)';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':bookId', $bookId);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':score', $score);
        $stmt->execute();
    } catch (\Exception $e) {
        die('Something happened with voting. Please try again');
    }
}

function deleteReview()
{

    try {
        $query = '';
        $stmt = $db->prepare($query);
        $stmt->bindParam();
        $stmt->execute();
    } catch (\Exception $e) {
        throw $e;
    }
} 
