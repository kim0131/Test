<?php
$con = mysqli_connect("49.50.175.144", "high", "high0", "GRS");
$sql = "SELECT * FROM GRS_BOARD";
$result = mysqli_query($con, $sql);

?>

<!doctype html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<div class="container-fluid">
		<h3><span class="glyphicon glyphicon-th-list"></span> Bootstrap 게시판</h3>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
			<form action="read.php" method="POST">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>번 호</th>
							<th>제목</th>
							<th>댓글수</th>
							<th>등록자</th>
							<th>조회수</th>
							<th>등록일시</th>
					</thead>

					<?php
					
					$sql = "SELECT * FROM GRS_BOARD";
					$result = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($result)) {
						$row = array(
							'BOARD_SEQ' => ($row['BOARD_SEQ']),
							'TITLE' => ($row['TITLE']),
							'COMMENT' => ($row['COMMENT']),
							'REGNAME' => ($row['REGNAME']),
							'HIT' => ($row['HIT']),
							'REGDATE' => ($row['REGDATE'])
						);
					?>
						<tbody>
							<tr>
								<th><?= $row['BOARD_SEQ'] ?></th>
								<th><a href="read.php?id=<?= $row['BOARD_SEQ'] ?>"><?= $row['TITLE'] ?></a></th>
								<th><?= $row['COMMENT'] ?></th>
								<th><?= $row['REGNAME'] ?></th>
								<th><?= $row['HIT'] ?></th>
								<th><?= $row['REGDATE'] ?></th>
							</tr>
						<?php
					}
						?>
						</tbody>
						</tr>
				</table>

				<div class="row">
					<div class="col-md-12">
						<a href="write.php" class="btn btn-primary pull-right">글쓰기</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>