<!DOCTYPE html>
<html lang="zh-CN">
<head>

</head>
<body>
  <div class="container">
      <h4>彩种：{{ $result['lottery_name'] }}</h4>
      <h4>彩票期数：{{ $result['lottery_no'] }}</h4>
      <h4>中奖号码：<mark>{{ $result['lottery_res'] }}</mark></h4>
      <h4>开奖日期：{{ $result['lottery_date'] }}</h4>
      <h4>兑奖截止日期：{{ $result['lottery_exdate'] }}</h4>
  </div>
</body>
</html>
