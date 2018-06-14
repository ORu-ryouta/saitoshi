-- Project Name : ビジネス
-- Date/Time    : 2018/06/14 21:45:51
-- Author       : saitoshikikaiyanmar
-- RDBMS Type   : MySQL
-- Application  : A5:SQL Mk-2

/*
  BackupToTempTable, RestoreFromTempTable疑似命令が付加されています。
  これにより、drop table, create table 後もデータが残ります。
  この機能は一時的に $$TableName のような一時テーブルを作成します。
*/

-- 取引先
--* RestoreFromTempTable
create table company (
  company_id int auto_increment not null comment '会社ID'
  , company VARCHAR(255) not null comment '会社名'
  , fixer VARCHAR(255) not null comment '代表者名'
  , note text comment '管理者備考'
  , tel VARCHAR(255) comment '電話番号'
  , address VARCHAR(255) comment '住所'
  , delete_flg TINYINT default 0 not null comment '削除フラグ'
  , recode_date DATETIME not null comment '登録日:YYYY/MM/DD'
  , update_time TIMESTAMP not null comment '更新日:YYYY/MM/DD'
  , constraint company_PKC primary key (company_id)
) comment '取引先:' ;

-- 仕入れ
--* RestoreFromTempTable
create table request (
  request_id int auto_increment not null comment '仕入れID'
  , parts_id INT not null comment '部品ID'
  , company_id INT not null comment '会社ID'
  , request_num INT not null comment '仕入数'
  , request_date DATETIME not null comment '仕入れ日'
  , price INT not null comment '単価'
  , delete_flg TINYINT default 0 not null comment '削除フラグ'
  , recode_date DATETIME not null comment '登録日:YYYY/MM/DD'
  , update_time TIMESTAMP not null comment '更新日:YYYY/MM/DD'
  , constraint request_PKC primary key (request_id)
) comment '仕入れ:' ;

-- 部品
--* RestoreFromTempTable
create table parts (
  parts_id int auto_increment not null comment '部品ID'
  , parts VARCHAR(255) not null comment '部品名'
  , category INT not null comment 'カテゴリー'
  , stock INT default 0 comment '在庫数'
  , min_stock INT default 0 comment '最低在庫数'
  , last_date DATETIME comment '最終仕入れ日'
  , delete_flg TINYINT default 0 not null comment '削除フラグ'
  , recode_date DATETIME not null comment '登録日:YYYY/MM/DD'
  , update_time TIMESTAMP not null comment '更新日:YYYY/MM/DD'
  , constraint parts_PKC primary key (parts_id)
) comment '部品:' ;

-- 売り上げ
--* RestoreFromTempTable
create table sale (
  sale_id int auto_increment not null comment '売り上げID'
  , order_id INT not null comment '注文ID'
  , price INT not null comment '金額'
  , credit_date DATETIME comment '入金日'
  , delete_flg TINYINT default 0 not null comment '削除フラグ'
  , recode_date DATETIME not null comment '登録日:YYYY/MM/DD'
  , update_time TIMESTAMP not null comment '更新日:YYYY/MM/DD'
  , constraint sale_PKC primary key (sale_id)
) comment '売り上げ:' ;

-- 注文
--* RestoreFromTempTable
create table order (
  order_id int auto_increment not null comment '注文ID'
  , member_id INT not null comment '顧客ID'
  , business VARCHAR(255) comment '商談内容'
  , work VARCHAR(255) comment '作業内容'
  , price INT not null comment '金額'
  , oder_date DATETIME not null comment '注文日:YYYY/MM/DD'
  , receipt_date DATETIME comment '受注日:YYYY/MM/DD'
  , complete_date DATETIME comment '完了日'
  , complete_plans DATETIME comment '完了予定日'
  , category INT not null comment 'カテゴリー'
  , status INT not null comment 'ステータス'
  , delete_flg TINYINT default 0 not null comment '削除フラグ'
  , recode_date DATETIME not null comment '登録日:YYYY/MM/DD'
  , update_time TIMESTAMP not null comment '更新日:YYYY/MM/DD'
  , constraint order_PKC primary key (order_id)
) comment '注文:' ;

-- 顧客
--* RestoreFromTempTable
create table member (
  member_id int auto_increment not null comment '顧客ID'
  , company_id INT comment '会社ID'
  , name VARCHAR(255) not null comment '顧客名'
  , gender TINYINT not null comment '性別:０男：１女'
  , address VARCHAR(255) not null comment '住所'
  , tel_1 VARCHAR(255) not null comment '連絡先１'
  , tel_2 VARCHAR(255) comment '連絡先２'
  , emal VARCHAR(255) comment 'E- mall'
  , delete_flg TINYINT default 0 not null comment '削除フラグ'
  , recode_date DATETIME not null comment '登録日:YYYY/MM/DD'
  , update_time TIMESTAMP not null comment '更新日:YYYY/MM/DD'
  , constraint member_PKC primary key (member_id)
) comment '顧客:' ;
