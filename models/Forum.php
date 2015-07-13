<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "forum".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $position
 * @property string $title
 * @property string $description
 * @property string $create_time
 * @property integer $locked
 *
 * @property Category $category
 * @property Theme[] $themes
 */
class Forum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forum';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => FALSE,
                'value' => function(){return date("Y-m-d H:i:s");},
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'position','locked','title'], 'required'],
            [['category_id', 'position', 'locked'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'position' => 'Position',
            'title' => 'Title',
            'description' => 'Description',
            'create_time' => 'Create Time',
            'locked' => 'Locked',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThemes()
    {
        return $this->hasMany(Theme::className(), ['forum_id' => 'id']);
    }
    public function getCount(){
        return $this->hasMany(Theme::className(), ['forum_id' => 'id'])->count();
    }

    public function getCountForums(){
        return $this->find()->count();
    }




        public function beforeSave($insert) {
             if (parent::beforeSave($insert)) {
                 if($this->isNewRecord){

                 if($this->position<=$this->getCountForums()){
                     
                     $this->updateAllCounters(["position"=>1], ['>=','position',  $this->position]);
                     
                 }}  else {
                             $oldPosition=  $this->getOldAttribute('position');
                if($this->position>$oldPosition){
                    $this->updateAllCounters(["position"=>-1], ['and',['>','position',$oldPosition],['<=','position',$this->position]]);
                }elseif ($this->position<$oldPosition) {
                    $this->updateAllCounters(["position"=>1], ['and',['>=','position',  $this->position],['<','position',$oldPosition]]);
                    }

        }
             return TRUE; 
             
        } else {

                return FALSE;
        }
            
            
    }
}
