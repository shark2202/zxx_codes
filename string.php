<?php
//�ַ�������

//��ѯ�ַ�
echo strpos("goods","o");//����߿�ʼ��ѯ
echo "<br/>";

echo stripos("GOODS","o");//��Сд�����е�
echo "<br/>";

echo strrpos("goods",'o');//���ұ߿�ʼ��ѯ
echo "<br/>";

//��ѯ�ַ����Ӵ�
echo strstr("123@qq.com","@qq");//��ѯ�Ӵ�
echo "<br/>";
echo strstr("123@qq.com","@qq",true);//��ѯ�Ӵ�,֮ǰ����Ϣ
echo "<br/>";
//stristr �����ִ�Сд��

echo strpbrk('abcdefg','gd');//ֻҪ�еڶ����ַ�������һ�������Ե�
echo "<br/>";

echo implode(array(1,2,3,4),'#');//����ת�����ַ��� ==> join
echo "<br/>";

print_r(explode(',',"1,2,3,4"));//�ַ���ת��Ϊ����,�ָ����ǰ��

//�ָ��ַ���
echo chunk_split("1234567890",3);//��������ַ���
echo "<br/>";
echo wordwrap("1234 567890 abcdef ghijk",2);
echo "<br/>";

echo strlen("1234");//�ַ�������
echo "<br/>";

//echo count("123");//Ԫ�صĸ���������1
//echo count(1);
//echo count(null); //0
//echo count(false);//1
//echo count(true);//1
