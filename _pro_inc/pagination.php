<?php
// 현재 URL의 쿼리스트링을 유지하면서 page 값만 변경
function updateQueryString($key, $value) {
    $query = $_GET; // 현재 URL의 쿼리스트링 가져오기
    $query[$key] = $value; // page 값 업데이트
    return '?' . http_build_query($query); // 업데이트된 쿼리스트링 반환
}
?>

<?php if ($totalPages > 1): ?>
    <li class="first"><a href="<?= updateQueryString('page', 1) ?>"></a></li>
<?php endif; ?>
<?php if ($page > 1): ?>
    <li class="prev"><a href="<?= updateQueryString('page', $page - 1) ?>"></a></li>
<?php endif; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <li class="page <?= $i == $page ? 'active' : '' ?>">
        <a href="<?= updateQueryString('page', $i) ?>"><?= $i ?></a>
    </li>
<?php endfor; ?>

<?php if ($page < $totalPages): ?>
    <li class="next"><a href="<?= updateQueryString('page', $page + 1) ?>"></a></li>
<?php endif; ?>
<?php if ($totalPages > 1): ?>
    <li class="last"><a href="<?= updateQueryString('page', $totalPages) ?>"></a></li>
<?php endif; ?>
<?

/*
<li class="first"><a href="#"></a></li>
<li class="prev"><a href="#"></a></li>
<li class="page active"><a href="#">1</a></li>
<li class="page"><a href="#">2</a></li>
<li class="page"><a href="#">3</a></li>
<li class="page"><a href="#">4</a></li>
<li class="page"><a href="#">5</a></li>
<li class="next"><a href="#"></a></li>
<li class="last"><a href="#"></a></li>
*/