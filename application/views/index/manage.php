<form action="<?php echo $postUrl; ?>" method="post">
    <?php if (isset($item['id'])): ?>
        <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
    <?php endif; ?>
    <input type="text" name="value" value="<?php echo isset($item['item_name']) ? $item['item_name'] : '' ?>">
    <input type="submit" value="提交">
</form>

<a class="big" href="/index/index">返回</a>