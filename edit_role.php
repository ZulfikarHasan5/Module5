<?php
// Only allow admins to access this page
if ($_SESSION['role'] !== 'admin') {
  header('Location:
