<?php
final class Utils {
    private function __construct() {
    }
    /**
     * Generate link.
     * @param string $page target page
     * @param array $params page parameters
     */
    public static function createLink($page, array $params = array()) {
        $params = array_merge(array('page' => $pagina), $params);
        return 'index.php?' .http_build_query($params);
    }
    public static function createLink2($pagina, array $params = array()) {
        $params = array_merge(array('pagina' => $pagina), $params);
        return 'relatorio.php?' .http_build_query($params);
    }

    /**
     * Format date.
     * @param DateTime $date date to be formatted
     * @return string formatted date
     */
    public static function formatDate(DateTime $date = null) {
        if ($date === null) {
            return '';
        }
        return $date->format('Y-m-d');
    }
    /**
     * Format date and time.
     * @param DateTime $date date to be formatted
     * @return string formatted date and time
     */
    public static function formatDateTime(DateTime $date = null) {
        if ($date === null) {
            return '';
        }
        return $date->format('d/m/Y H:i');
    }
    /**
     * Redirect to the given page.
     * @param type $page target page
     * @param array $params page parameters
     */
    public static function redirect($pagina, array $params = array()) {
        header('Location: ' . self::createLink($pagina, $params));
        die();
    }

    /**
     * Get value of the URL param.
     * @return string parameter value
     * @throws NotFoundException if the param is not found in the URL
     */
    public static function getUrlParam($nome) {
        if (!array_key_exists($nome, $_GET)) {
            throw new NotFoundException('URL parameter "' . $nome . '" not found.');
        }
        //print_r($_GET[$name]);die;
        return $_GET[$nome];
    }

    /**
     * Get {@link Todo} by the identifier 'id' found in the URL.
     * @return Todo {@link Todo} instance
     * @throws NotFoundException if the param or {@link Todo} instance is not found
     */
    public static function getTodoByGetId() {
        $id = null;
        try {
            $id = self::getUrlParam('id');
        } catch (Exception $ex) {
            throw new Excecao('No TODO identifier provided.');
        }
        if (!is_numeric($id)) {
            throw new Excecao('Invalid TODO identifier provided.');
        }
        $dao = new TodoDao();
        $todo = $dao->findById($id);
        if ($todo === null) {
            throw new Excecao('Unknown TODO identifier provided.');
        }
        return $todo;
    }
    public static function getOdbcByGetId() {
        $id = null;
        try {
            $id = self::getUrlParam('id');
        } catch (Exception $ex) {
            throw new Excecao('No ODBC identifier provided.');
        }
        if (!is_numeric($id)) {
            throw new Excecao('Invalid ODBC identifier provided.');
        }
        $dao = new OdbcDao();
        $odbc = $dao->findById($id);
        if ($odbc === null) {
            throw new NotFoundException('Unknown ODBC identifier provided.');
        }
        return $odbc;
    }
    public static function getJudiByGetId() {
        $id = null;
        try {
            $id = self::getUrlParam('id');
        //echo $id;die;
        } catch (Exception $ex) {
            throw new Excecao('No JUDI identifier provided.');
        }
        if (!is_numeric($id)) {
            throw new Excecao('Invalid JUDI identifier provided.');
        }
        $dao = new JudiDao();
        //print_r($dao->findById($id));die;
        $judi = $dao->findById($id);
        if ($judi === null) {
            throw new Excecao('Unknown JUDI identifier provided.');
        }
        //print_r($judi);die;
        return $judi;
    }
    public static function getJudiByGetId2() {
        $id = null;
        try {
            $id = self::getUrlParam('id');
        //echo $id;die;
        } catch (Exception $ex) {
            throw new Excecao('No JUDI identifier provided.');
        }
        if (!is_numeric($id)) {
            throw new Excecao('Invalid JUDI identifier provided.');
        }
        $dao = new JudiDao();
        //print_r($dao);die;
        $judi = $dao->findById2($id);
        //print_r($judi);die;
        if ($judi === null) {
            throw new Excecao('Unknown JUDI identifier provided.');
        }
        //print_r($judi);die;
        return $judi;
    }

    /**
     * Capitalize the first letter of the given string
     * @param string $string string to be capitalized
     * @return string capitalized string
     */
    public static function capitalize($string) {
        return ucfirst(mb_strtolower($string));
    }

    /**
     * Escape the given string
     * @param string $string string to be escaped
     * @return string escaped string
     */
    public static function escape($string) {
        //print_r(htmlspecialchars($string, ENT_QUOTES));
        return htmlspecialchars($string, ENT_QUOTES);
    }
}
?>