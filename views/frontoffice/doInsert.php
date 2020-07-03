<?php

	require_once(ROOT.'/models/includes/Autoloader.php');
	Autoloader::register();

	//////////////////////////////////////////////////////////////////////////////////////
	// Customer's data

	// Ouvre session
	session_start();

	$idcust = NULL;
	if (isset($_SESSION['id'])) {
		$idcust = $_SESSION['id'];
	}

	////////// Ajax from customer //////////
	// Get from customer
	$data = array();

	if (isset($_POST['data'])) {
	  $data = json_decode($_POST['data'], true);
	}
	$list1 = NULL;
	if (isset($data['list1'])) {
	  $list1 = $data['list1'];
	}
	$list2 = NULL;
	if (isset($data['list2'])) {
		$list2 = $data['list2'];
	}
	$review5 = NULL;
	if (isset($data['review5'])) {
	  $review5 = $data['review5'];
	}
	$review4 = NULL;
	if (isset($data['review4'])) {
		$review4 = $data['review4'];
	}
	$review3 = NULL;
	if (isset($data['review3'])) {
		$review3 = $data['review3'];
	}
	$review2 = NULL;
	if (isset($data['review2'])) {
		$review2 = $data['review2'];
	}
	$review1 = NULL;
	if (isset($data['review1'])) {
		$review1 = $data['review1'];
	}

  if($review1 != 0){

		$CreateReview =	new Review;
		$CreateReview->createReview($idcust, $list1, $list2, $review1);

		// Redirection
		header("Location: logout.php");

  }elseif($review2 != 0){

		$CreateReview =	new Review;
		$CreateReview->createReview($idcust, $list1, $list2, $review2);

		// Redirection
		header("Location: logout.php");

	}elseif($review3 != 0){

			$CreateReview =	new Review;
			$CreateReview->createReview($idcust, $list1, $list2, $review3);

			// Redirection
			header("Location: logout.php");

  }elseif($review4 != 0){

		$CreateReview =	new Review;
		$CreateReview->createReview($idcust, $list1, $list2, $review4);

		// Redirection
		header("Location: logout.php");

  }elseif($review5 != 0){

		$CreateReview =	new Review;
		$CreateReview->createReview($idcust, $list1, $list2, $review5);

		// Redirection
		header("Location: logout.php");
  }
	?>
