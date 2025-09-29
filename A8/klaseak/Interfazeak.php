<?php
interface ZarataEgin {
    public function esan();
}

class Txakurra implements ZarataEgin {
    public function esan() {
        echo "Txakurra: GUAU!";
    }
}

class Katua implements ZarataEgin {
    public function esan() {
        echo "Katua: MIAU!";
    }
}
?>