<?php
$pollRepository = $entityManager->getRepository('Poll');
$polls = $pollRepository->findAll();
?>