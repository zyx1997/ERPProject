<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;

class HetongListsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('h_id');

		return $validator;
	}
	//获取最新订单的日期和序号
	public function getorderid()
	{
		$sql = 'select * from order_records where type = "H"';	
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	//更新最新订单的日期和序号
	public function updateorderid($order_id,$date)
	{
		$sql = 'update order_records set date = "'.$date.'",order_id = "'.$order_id.'" where type = "H"';	
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
	}
	/*
	public function searchname($name)
	{
		$sql = "select * from chengpin_initials where 1=1 ";
		if( $name != "" )
			$sql = $sql."and name like '%".$name."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
	public function searchdb($duixiang, $h_id, $dh_name)
	{
		$sql = "select * from hetong_lists 
		where isrecord=0 ";
		if( $duixiang != "" )
			$sql = $sql."and duixiang like '%".$duixiang."%' ";
		if( $h_id != "" )
			$sql = $sql."and h_id like '%".$h_id."%' ";
		if( $dh_name != "" )
			$sql = $sql."and dh_name like '%".$dh_name."%' ";
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$results = $stmt ->fetchAll('assoc');
		
		return $results;
	}
	*/
	public function copyHetongList($id, $h_id)
	{
		// 复制合同单信息，一条记录
		$sql = 'insert into hetong_lists (user,duixiang,h_id,dh_type,dh_id,dh_name,delivery_addr,jiaohuofangshi,jiaohuofangshi_tianshu,jiaohuofangshi_qita,zhibaoqi,beizhu,istijiao,isshenhe,shenheok,pingshenbumen_target,pingshenbumen_real,pingshenbumen_ok,pingshenbumen_diss,shenhebeizhu,targetshenhe_yingxiao,isshenhe_yingxiao,shenheok_yingxiao,shenheren_yingxiao,shenhe_beizhu_yingxiao,shenhe_time_yingxiao,targetshenhe_office,isshenhe_office,shenheok_office,shenheren_office,shenhe_beizhu_office,shenhe_time_office,targetshenhe_zhijian,isshenhe_zhijian,shenheok_zhijian,shenheren_zhijian,shenhe_beizhu_zhijian,shenhe_time_zhijian,targetshenhe_shengchan,isshenhe_shengchan,shenheok_shengchan,shenheren_shengchan,shenhe_beizhu_shengchan,shenhe_time_shengchan,targetshenhe_caigou,isshenhe_caigou,shenheok_caigou,shenheren_caigou,shenhe_beizhu_caigou,shenhe_time_caigou,targetshenhe_manager,keyishenhe_manager,isshenhe_manager,shenheok_manager,shenheren_manager,shenhe_beizhu_manager,shenhe_time_manager,heji_totalprice)
		select user,duixiang,h_id,dh_type,dh_id,dh_name,delivery_addr,jiaohuofangshi,jiaohuofangshi_tianshu,jiaohuofangshi_qita,zhibaoqi,beizhu,istijiao,isshenhe,shenheok,pingshenbumen_target,pingshenbumen_real,pingshenbumen_ok,pingshenbumen_diss,shenhebeizhu,targetshenhe_yingxiao,isshenhe_yingxiao,shenheok_yingxiao,shenheren_yingxiao,shenhe_beizhu_yingxiao,shenhe_time_yingxiao,targetshenhe_office,isshenhe_office,shenheok_office,shenheren_office,shenhe_beizhu_office,shenhe_time_office,targetshenhe_zhijian,isshenhe_zhijian,shenheok_zhijian,shenheren_zhijian,shenhe_beizhu_zhijian,shenhe_time_zhijian,targetshenhe_shengchan,isshenhe_shengchan,shenheok_shengchan,shenheren_shengchan,shenhe_beizhu_shengchan,shenhe_time_shengchan,targetshenhe_caigou,isshenhe_caigou,shenheok_caigou,shenheren_caigou,shenhe_beizhu_caigou,shenhe_time_caigou,targetshenhe_manager,keyishenhe_manager,isshenhe_manager,shenheok_manager,shenheren_manager,shenhe_beizhu_manager,shenhe_time_manager,heji_totalprice
		from hetong_lists 
		where id = "'.$id.'" ';
		$conn = ConnectionManager::get('default');
		$conn->execute($sql);
		// 获取合同单最大编号 $maxid
		// 如果不是频繁的插入,则可以使用这种方法来获取上一条插入记录的自增id值
		$sql = 'select max(id) as maxid from hetong_lists where h_id = "'.$h_id.'" ';
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute($sql);
		$maxid = (int)(($stmt ->fetchAll('assoc'))[0]['maxid']);
		//修改新增合同单的isrecord标志位
		$sql = 'update hetong_lists set isrecord=1 where id = "'.$maxid.'" ';
		$conn = ConnectionManager::get('default');
		$conn->execute($sql);
		
		// 之后需要存储合同单所包含产品的信息，数条记录，以合同单编号 h_keyid $maxid 为联系
		return $maxid;
	}
}