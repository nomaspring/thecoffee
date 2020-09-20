<html>
	<form action="showbilldetail.php" method="POST">
		<table class="inquiry">
			<tr>
				<td>time</td>
				<td>table#</td>
				<td>npr</td>
				<td>bill#</td>
			</tr>

<!-- recall today's sales from totalbill.txt -->

		  	<?php
				include '../repository.php';
				$fnst = $repository."oms1/record/record/total/totalbill.txt";
				$cfst = fopen($fnst, "r");
				$saleslinearr = file($fnst);
				fclose($cfst);

				foreach($saleslinearr AS $case) {
					$eachbill = explode(":", $case);
					if ($eachbill[1]==$dispyear and $eachbill[2]==$dispmonth and $eachbill[3]==$dispdate) {
						echo "<tr><td>".$eachbill[4].":".$eachbill[5]."</td><td>".$eachbill[6]."</td><td>".number_format($eachbill[7])."</td><td><button class=\"billbtn\" name=\"billno\" value=\"".$eachbill[0]."\">".$eachbill[0]."</button></td></tr>";

						fwrite($inqfile, $eachbill[4].":".$eachbill[5]."\t".$eachbill[6]."\t".number_format($eachbill[7])."\n");

						$tc++;
						$todaysales += $eachbill[7];
					}
				}
			?>
		</table>
	</form>
</html>	