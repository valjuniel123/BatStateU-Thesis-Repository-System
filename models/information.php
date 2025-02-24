<?php

class Information extends Database
{
    public function getCampuses()
    {
        $sql = "SELECT * FROM campus ORDER BY campusName ASC";
        $result = $this->connect()->query($sql);
        $campuses = [];
        while ($row = $result->fetch_assoc()) {
            $campuses[] = $row;
        }
        return $campuses;
    }

    public function getDeptByCampus($id)
    {
        $option = '';
        $sql = "SELECT * FROM department WHERE campusID = ? ORDER BY departmentName ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $option .= '<option value="' . $row['id'] . '">' . $row['departmentName'] . '</option>';
            }
        } else {
            $option .= '<option value="">No department found</option>';
        }

        return json_encode($option);
    }
}
