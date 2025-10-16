<?php
session_start();

require_once __DIR__ . '/Klaseak/DB.php';
require_once __DIR__ . '/Klaseak/Taldea.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$db = new DB();
$db->konektatu();
$taldeaKlasea = new Taldea($db);

/** GET: talde guztien informazioa bueltatuko du (haren partaiderik gabe).*/
/** (id): “id” argumentuarekin heltzen bada eskaera, id hori daukan taldearen informazioa bueltatuko du bakarrik, baina bere partaideen zerrendarekin batera. */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);
        getTaldeaById($taldeaKlasea, $id);
    } else {
        getAllTaldeak($taldeaKlasea);
    }
    exit();
}

function getAllTaldeak($taldeaKlasea)
{
    $taldeak = $taldeaKlasea->getAll();
    echo json_encode($taldeak);
}
function getTaldeaById($taldeaKlasea, $id)
{
    $taldea = $taldeaKlasea->getById($id);

    if ($taldea) {
        echo json_encode($taldea);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Taldea ez da aurkitu']);
    }
}

/** POST: talde berri bat sortuko du bidalitako informazioarekin JSON formatuan. */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');

    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['izena']) && isset($input['puntuak'])) {
        $izena = $input['izena'];
        $puntuak = intval($input['puntuak']);

        $id = $taldeaKlasea->insert($izena, $puntuak);

        echo json_encode([
            'success' => true,
            'id' => $id
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            'error' => 'Parametroak falta dira'
        ]);
    }
    exit();
}

/** PUT: talde baten puntuak eguneratuko ditu. */
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    header('Content-Type: application/json; charset=utf-8');

    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['id']) && isset($input['puntuak'])) {
        $id = intval($input['id']);
        $puntuak = intval($input['puntuak']);

        $updated = $taldeaKlasea->updatePuntuak($id, $puntuak);

        if ($updated) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Taldea ez da aurkitu']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Parametroak falta dira']);
    }
    exit();
}

/** DELETE: talde bat ezabatuko du. */
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);
        $deleted = $taldeaKlasea->delete($id);

        if ($deleted) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Taldea ez da aurkitu']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'ID parametroa falta da']);
    }
    exit();
}