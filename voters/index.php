<?php

    require_once("inc/header.php");
    require_once("inc/navigation.php");

?>
    <div class="row my-3">
        <div class="col-12">
            <h3>  Voters Panel  </h3>

            <?php
                $fetchingActiveElections = mysqli_query($db, "SELECT * FROM elections WHERE status = 'Active'") or 
                die(mysqli_error($db));
                $totalActiveElections = mysqli_num_rows($fetchingActiveElections);

                if($totalActiveElections > 0)
                {
                    while($data = mysqli_fetch_assoc($fetchingActiveElections))
                    {
                        $election_id = $data['id'];
                        $election_topic = $data['election_topic'];
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="bg-green text-black"><h5> ELECTION TOPIC: <?php echo
                                        strtoupper($election_topic); ?> </h5></th>
                                    </tr>

                                    <tr>
                                        <th> Photo </th>
                                        <th> Candidate Details   </th>
                                        <th> # of Votes    </th>
                                        <th> Action     </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $fetchingCandidates = mysqli_query($db, "SELECT * FROM candidate_details WHERE 
                                    election_id = '".$election_id."'") or die (mysqli_error($db));

                                    while($candidateData = mysqli_fetch_assoc($fetchingCandidates))
                                    {
                                        $candidate_id = $candidateData['id'];
                                        $candidate_photo = $candidateData['candidate_photo'];

                                        //fetching candidate votes
                                        $fetchingVotes = mysqli_query($db, "SELECT * FROM votings WHERE candidate_id = '".$candidate_id."'")
                                        or die (mysqli_error($db));
                                        $totalVotes = mysqli_num_rows($fetchingVotes);
                                    
                                ?>

                                    <tr>
                                        <td><img src="<?php echo $candidate_photo; ?>" class="candidate_photo"></td>
                                        <td> <?php  echo "<b>" . $candidateData['candidate_name'] . "</b><br />" .
                                        $candidateData['candidate_details']; ?></td>
                                        <td><?php  echo $totalVotes; ?></td>
                                        <td> <button class="btn btn-md  btn-success"> Vote </button></td>

                                    </tr>

                                 <?php

                                    }


                                 ?>
                                </tbody>


                    </table>


                        <?php
                        

                    }

                }else {
                    echo "No any Active Elections.";
                }


            ?>

        </div>
    </div>






<?php
    require_once("inc/footer.php");
?>