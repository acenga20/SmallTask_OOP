<?php

interface UserStorageInterface{
    public function fetchAllUsersData();
    public function fetchSingleUsersData($id);
}