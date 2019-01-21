
<?php

function request() {
    return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
}

function register($username, $email, $password)
{
    global $db;
    $ownerId = 0;
    
    try {
        $query = "INSERT INTO People (username, email, password, role_id) VALUES (:username, :email, :password, 2)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return findUserByName($username);
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
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
    $ID = 0;
    
    try {
        $query = 'INSERT INTO votes (book_id, user_id, value) VALUES (:bookId, :ID, :score)';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':bookId', $bookId);
        $stmt->bindParam(':ID', $ID);
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

  function redirect($path, $extra = [])
  {
      $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND, ['Location' => $path]);
      if (key_exists('cookies', $extra)) {
          foreach ($extra['cookies'] as $cookie)
          {
              $response->headers->setCookie($cookie);
          }
      }
      $response->send();
      exit;
  }

  function decodeJwt($prop = null) {
    \Firebase\JWT\JWT::$leeway = 1;
    $jwt = \Firebase\JWT\JWT::decode(
        request()->cookies->get('access_token'),
        getenv('SECRET_KEY'),
        ['HS256']
    );
    
    if ($prop === null) {
        return $jwt;
    }
    
    return $jwt->{$prop};
}


function findUserByAccessToken() {
    global $db;
    
    try {
        $userId = decodeJwt('sub');
    } catch (\Exception $e) {
        throw $e;
    }
    
    try {
        $query = "SELECT * FROM People WHERE ID = :userId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (\Exception $e) {
        throw $e;
    }
}


  function updatePassword($password, $userId) 
  {
    global $db;

    try {
        $query = 'UPDATE People SET password=:password WHERE id = :userId';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    } catch (\Exception $e) {
    return false;
    }
    return true;
  }


  function isAuthenticated() 
  {
      if (!request()->cookies->has('access_token'))
      {
          return false;
      }

      try {
        decodeJwt();
        return true;
      } catch (\Exception $e) {
          return false;
      }
  }

  function requireAuth() {
      if(!isAuthenticated()) {
          $accessToken = new \Symfony\Component\HttpFoundation\Cookie("access_token", "Expired",
          time() -3600, '/', getenv('COOKIE_DOMAIN'));
          redirect('/php_reflection/login.php', ['cookies' => [$accessToken]]);
      }
  }

  function display_errors() {
      global $session;

      if(!$session->getFlashBag()->has('error')) {
          return;
      }

      $messages = $session->getFlashBag()->get('error');
      $response = '<div class="alert alert-danger alert-dismissable">';
      foreach ($messages as $message) {
          $response .= "{$message}<br />";
      }
      $response .= '</div>';

      return $response;
  }

  function display_success() {
      global $session;

      if (!$session->getFlashBag()->has('error')) {
          return;
      }

      $messages = $session->getFlashBag()->get('success');
      $response = '<div class="alert alert-success alert-dismissable">';
      foreach ($messages as $message) {
          $response .= "{$message}<br />";
      }
      $response .= '</div>';

      return $response;
  }