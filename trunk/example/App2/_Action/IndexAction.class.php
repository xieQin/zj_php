<?php

/**
 * Description of IndexAction
 *
 * @author Joy
 */
class IndexAction extends Action {

    public function index() {
        echo "this is Index / index";
    }

    public function t1() {
        renderView("index", "t1");
    }

    public function t2() {
        echo zj_test();
    }

    function doc() {
        $doc = ApiDocHandler::generateDoc(getC("APP_PATH") . "/_Action/ApiAction.class.php");
        echo $doc;
    }

    function t3() {
        global $zj_config;
        my_log($zj_config);
    }

    function t4() {
        $list = FileHandler::dirLs(getC("APP_PATH"));
        my_log($list);
    }

    function t5() {
        $list = sub_dir_ls(getC("APP_PATH"));
       my_log($list);
    }
    
    function t6($dir){
        $this->readFileFromDir(getC("APP_PATH"));    
    }

    function readFileFromDir($dir) {
        //$dir = getC("APP_PATH");
        if (!is_dir($dir)) {
            return false;
        }
        //打开目录
        $handle = opendir($dir);
        while (($file = readdir($handle)) !== false) {
            
            //排除掉当前目录和上一个目录
            if ($file == "." || $file == "..") {
                continue;
            }
            $file = $dir . DIRECTORY_SEPARATOR . $file;
            print_r($file . '<br />');
            //如果是文件就打印出来，否则递归调用
            if (is_file($file)) {
                print_r($file . '<br />');
            } elseif (is_dir($file)) {
                $this->readFileFromDir($file);
            }
        }
    }

}

?>
