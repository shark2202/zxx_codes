<?php
//���麯��

//����
// sort rsort usort asort 

//�����������

$arr = array(1);
array_push($arr,2,3,4);//��ջ
array_pop($arr);//��ջ

array_unshift($arr,4,5,6);//���ڶ��е�ͷ������������
array_shift($arr);//��ͷ���Ƴ�

unset($arr[3]);//ɾ��ָ����Ԫ��

//��������������
array_slice($arr,1);//��������ȡ��һ��
array_splice($arr,1,10);//���������Ƴ�һ�Σ���ȡ�滻һ��

array_combine(array(1),array("one"));//��-ֵ�ϲ�������

array_merge(array(10),array(20),array(30));//�������ϲ�����ͬ�ļ���ֵ���渲��ǰ���ֵ �����������ֵ��ӵ����棡
//array_merge_recursive() �ݹ�ϲ�����ͬ����ֵ��ϲ���������

array_chunk($arr,2);//�ָ����鵽�����飬ָ�����ȵ�

array_fill(1,10);//ʹ��ָ����ֵ������鵽ָ���ĳ���
array_fill_keys(array(22,"100"),100);//ʹ���ƶ��ļ������ֵ�������

shuffle($arr);//��������
array_rand($arr);//�����ȡ����ļ���������ָ������

//����Ĳ�ͽ���
array_intersect(array(1,2,3),array(2,3,4));//����ǱȽ�ֵ�ģ�������-ֵ��ϵ����һ�������ǻ�׼
//��ͬ�ıȽ���(string)$e1 === (string)$e2 ����ͬ�ģ�����

array_diff(array(1,2,3,4),array(2,3));//�Ƚ�ֵ�Ĳ���Ե�һ������Ϊ��׼��

//array_intersect_key() ֻ�Ƚϼ�
//array_intersect_assoc() �Ƚϼ���ֵ �����ϸ�Ƚϵ�

//array_interscet_ukey() �Զ��巽���Ƚϼ�
//array_uintersect() �û��Զ��庯���Ƚ�ֵ
//array_uinterscet_assoc() �Զ��庯���Ƚϼ�-ֵ


//array_diff ����Ƚ�ֵ
//array_diff_key ��Ƚϼ�
//array_diff_assoc �����ֵ���Ƚ�
//array_diff_ukey �Զ���Ƚϼ�
//array_diff_uassoc �Զ������ֵ���Ƚϣ��Զ���ֻ����ֵ�ıȽϣ�ͬʱҪ���ҲҪ���
//array_udiff �Զ���Ƚ�ֵ�����ܼ��Ƿ����
//aray_udiff_assoc �Զ���Ƚ�ֵ����Ҳ�Ƚ�
//array_udiff_uassoc �Զ���Ƚϼ���ֵ

