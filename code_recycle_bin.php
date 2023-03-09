________________________________________________________________________________________________
if ($rowcontrol == 1) {
                    echo '
                    <tr class="tr-class-2"> 
                        <td>' . $serial . '</td>
                        <td>' . $pname . '</td>
                        <td>' . $ptype . '</td>
                        <td>' . $cname . '</td>
                        <td>' . $edate . '</td>
                        <td>
                        <a href="update_product.php?updateid=' . $pid . '"><button class="update-btn">Update</button></a> 
                        <a href="delete.php?deleteid=' . $pid . '"><button class="delete-btn">Delete</button></a>
                        </td>
                    </tr>
                    ';
                } else {
                    echo '
                    <tr class="tr-class-1">
                        <td>' . $serial . '</td> 
                        <td>' . $pname . '</td>
                        <td>' . $ptype . '</td>
                        <td>' . $cname . '</td>
                        <td>' . $edate . '</td>
                        <td>
                        <a href="update_product.php?updateid=' . $pid . '"><button class="update-btn">Update</button></a> 
                        <a href="delete.php?deleteid=' . $pid . '"><button class="delete-btn">Delete</button></a>
                        </td>
                    </tr>
                    ';
                }
________________________________________________________________________________________________






________________________________________________________________________________________________
echo '
                    <tr class="tr-class-'.$rowcontrol.'"> 
                        <td>' . $serial . '</td>
                        <td>' . $pname . '</td>
                        <td>' . $ptype . '</td>
                        <td>' . $cname . '</td>
                        <td>' . $edate . '</td>
                        <td>
                        <a href="update_product.php?updateid=' . $pid . '"><button class="update-btn">Update</button></a> 
                        <a href="delete.php?deleteid=' . $pid . '"><button class="delete-btn">Delete</button></a>
                        </td>
                    </tr>
                    ';
________________________________________________________________________________________________




