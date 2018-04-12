<?php
//这是我们需要的函数的一个文件
function arr_unique1($arr2d){
	foreach ($arr2d as $k => $v) {
		//将二维数组中的每一个一维数组转化为一个字符串
		$v=join(',',$v);
		//数组添加元素
		$temp[]=$v;
	}
	//将一维数组去重
	$temp=array_unique($temp);
	//把去重后的一维数组再转化为二维数组
	foreach ($temp as $k => $v) {
		$temp[$k]=explode(',',$v);
	}
	return $temp;
}


//二维数组去掉重复值  
function arr_unique($a){     
    foreach($a[0] as $k => $v){  //二维数组的内层数组的键值都是一样，循环第一个即可  
        $ainner[]= $k;   //先把二维数组中的内层数组的键值使用一维数组保存  
    }    
    foreach ($a as $k => $v){    
        $v =join(",",$v);    //将 值用 逗号连接起来  
        $temp[$k] =$v;         
    }    
     
    $temp =array_unique($temp);    //去重    
    foreach ($temp as $k => $v){    
        $a = explode(",",$v);   //拆分后的重组  
        $arr_after[$k]= array_combine($ainner,$a);  //将原来的键与值重新合并 
    }    
    return $a;    
}