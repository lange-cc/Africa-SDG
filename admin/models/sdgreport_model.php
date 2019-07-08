<?php

/**
 *
 */
class sdgreport_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function AddnewData($title, $file, $content, $year, $index, $section, $lang)
    {

        $proced = new \stdClass();

        $id = $this->dataB::table('sdg_report')->insertGetId([
            'title' => $title,
            'file' => $file,
            'content' => $content,
            'year' => $year,
            'r_index' => $index,
            'section' => $section,
            'lang' => $lang
        ]);

        if ($id != null) {
            if ($lang == 'en') {
                $proced->status  = "success";
                $proced->message = "New Report successfully added.";
                $myJSON = json_encode($proced);
                echo $myJSON;
            } else {
                $proced->status = "success";
                $proced->message = "New Report successfully added.";
                $myJSON = json_encode($proced);
                echo $myJSON;
            }

        } else {
            if ($lang == 'en') {
                $proced->status  = "fail";
                $proced->message = "Failed to add the report added.";
                $myJSON = json_encode($proced);
                echo $myJSON;
            } else {
                $proced->status  = "fail";
                $proced->message = "Failed to add the report added.";
                $myJSON = json_encode($proced);
                echo $myJSON;
            }

        }
    }


    public function getreportData()
    {
        $data = $this->dataB::table('sdg_report')->select('id', 'title', 'file', 'content', 'year', 'r_index')->where([['lang', '=', LANG]])->get();
        return $data;
    }

    public function getUniqueReportData($id)
    {
        $data = $this->dataB::table('sdg_report')->select('id', 'title', 'file', 'content', 'section', 'year')->where([['id', '=', $id]])->get();
        echo $data;
    }

    public function updateData($title, $file, $id, $content, $section, $year)
    {
        $proced = new \stdClass();
        $update = $this->dataB::table('sdg_report')->where('id', $id)->update(['title' => $title, 'file' => $file, 'content' => $content, 'section' => $section, 'year' => $year]);
        if ($update) {
            $proced->status = "success";
            $proced->message = "Report successfully update.";
            $myJSON = json_encode($proced);
            echo $myJSON;

        } else if ($update == 0) {
            $proced->status = "success";
            $proced->message = "Report successfully update.";
            $myJSON = json_encode($proced);
            echo $myJSON;

        } else {
            $proced->status = "fail";
            $proced->message = "Failed to update the report.";
            $myJSON = json_encode($proced);
            echo $myJSON;

        }
    }

    public function deleteReport($id)
    {
        $proced = new \stdClass();
        $update = $this->dataB::table('sdg_report')->where('id', $id)->delete();
        if ($update) {
            $proced->status = "success";
            $proced->message = "Report successfully delete.";
            $myJSON = json_encode($proced);
            echo $myJSON;

        } else {
            $proced->status = "fail";
            $proced->message = "Failed to delete the report.";
            $myJSON = json_encode($proced);
            echo $myJSON;

        }
    }


    public function copyData($lang)
    {
        $command2 = $this->db->prepare("SELECT * FROM `sdg_report` WHERE lang = 'en' ");
        $command2->execute();
        if ($command2->rowCount() > 0) {
            $num = 0;
            while ($row2 = $command2->fetch(PDO::FETCH_ASSOC)) {
                $num = $num + 1;


                $id = $row2['id'];
                $title = $row2['title'];
                $file = $row2['file'];
                $content = $row2['content'];
                $year = $row2['year'];
                $index = $row2['r_index'];

                $command = $this->db->prepare("SELECT * FROM `sdg_report` WHERE lang = :lang AND r_index = :index");
                $command->execute(array(
                    ':lang' => $lang,
                    ':index' => $index
                ));
                if ($command->rowCount() > 0) {
                    if ($num == $command2->rowCount()) {
                        $proced = new \stdClass();
                        $proced->status = "success";
                        $proced->message = "All data successfully Updated";
                        $myJSON = json_encode($proced);
                        echo $myJSON;
                    }
                } else {

                    $this->AddnewData($title, $file, $content, $year, $index, $lang);

                    if ($num == $command2->rowCount()) {
                        $proced = new \stdClass();
                        $proced->status = "success";
                        $proced->message = "All data successfully saved";
                        $myJSON = json_encode($proced);
                        echo $myJSON;
                    }

                }
            }
        } else {
            echo "no data";
        }
    }

    public function AddFileToReport($title, $file, $report_id)
    {
        $id = $this->dataB::table('sdg_report_files')->insertGetId([
            'title' => $title,
            'file_name' => $file,
            'report_id' => $report_id
        ]);

        if ($id != null) {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = "File added";
            $myJSON = json_encode($proced);
            echo $myJSON;
        } else {
            $proced = new \stdClass();
            $proced->status = "fail";
            $proced->message = "Failed to add file";
            $myJSON = json_encode($proced);
            echo $myJSON;
        }
    }

    public function GetfilesData($id)
    {
        $data = $this->dataB::table('sdg_report_files')->where([['report_id', '=', $id]])->get();
        return $data;
    }

    public function DeleteFileData($id)
    {
        $proced = new \stdClass();
        $update = $this->dataB::table('sdg_report_files')->where('id', $id)->delete();
        if ($update) {
            $proced->status = "success";
            $proced->message = "File deleted";
            $myJSON = json_encode($proced);
            echo $myJSON;

        } else {
            $proced->status = "fail";
            $proced->message = "Failed to delete.";
            $myJSON = json_encode($proced);
            echo $myJSON;
        }
    }

}

?>