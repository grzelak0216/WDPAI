<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Item.php';
require_once __DIR__.'/../repository/TransportRepository.php';

class TransportController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $transportRepository;

    public function __construct()
    {
        parent::__construct();
        $this->transportRepository = new TransportRepository();
    }

    public function transport_notice()
    {
        $items = $this->transportRepository->getTransportNotices();
        $this->render('transport_notice', ['items' => $items]);
    }

    public function info_transport_notice()
    {
        $id = $_GET['hidden'];
        $item = $this->transportRepository->getTransportNoticeInfo($id);
        $this->render('info_transport_notice', ['item' => $item]);
    }

    public function addTransportNotice()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            // TODO create new project object and save it in database
            $item = new Item(
                $_POST['startCity'],
                $_POST['startStreet'],
                $_POST['startNumber'],
                $_POST['endCity'],
                $_POST['endStreet'],
                $_POST['endNumber'],
                $_POST['width'],
                $_POST['height'],
                $_POST['depth'],
                $_POST['name'],
                $_POST['type'],
                $_POST['payment'],
                $_POST['time'],
                $_POST['passengers'],
                $_FILES['file']['name'],
                $_POST['description'],
                $_POST['creatorName'],
                $_POST['creatorSurname'],
                $_POST['id']
            );

            $this->transportRepository->addTransportNotice($item);

            return $this->render('transport_notice', [
                'messages' => $this->message,
                'items' => $this->transportRepository->getTransportNotices()
            ]);
        }
        return $this->render('add_transport_notice', ['messages' => $this->message]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->transportRepository->getProjectByCities($decoded['search1'], $decoded['search2']));
        }
    }



    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

    public function addTransportNoticeToUser(int $ti_id)
    {
        $this->transportRepository->addTransportNotificationToUser($ti_id);
        http_response_code(200);
    }




}