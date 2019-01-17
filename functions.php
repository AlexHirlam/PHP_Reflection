<?php

function request() {
    return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
}

function register($username, $user_email, $user_password)
{
    global $db;
    $ownerId = 0;
    
    try {
        $query = "INSERT INTO People (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $user_email);
        $stmt->bindParam(':password', $user_password);
        return $stmt->execute();
    } catch (\Exception $e) {
        throw $e;
    }
}

function findUserByName($username)
{
    global $db;

    try {
        $query = "SELECT * FROM People WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    } catch (\Exception $e) {
        throw $e;
    }
}

function findUserByUser($email)
{
    global $db;

    try {
        $query = "SELECT * FROM People WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

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

function getReview($review_ID) 
{
    global $db;
    
    try {
        $query = "SELECT * FROM GameReview WHERE review_ID = ?";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $review_ID);
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

function vote($review_ID, $score) {
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

function deleteReview($review_ID) {
    global $db;
    try {
       $stmt = $db->prepare("DELETE from GameReview where review_ID = ? ");
       $stmt->execute([$review_ID]);
       return true;
    } catch (\Exception $e) {
       return false;
    }
  }

  function Redirect($url, $permanent = false)
  {
      header('Location: ' . $url, true, $permanent ? 301 : 302);
      exit();
  }
