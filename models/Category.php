<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property integer $position
 * @property string $create_time
 *
 * @property Forum[] $forums
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    
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
    
    
    public function rules()
    {
        return [
            [['title', 'position'], 'required'],
            [['position'], 'integer'],
            [['title'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'position' => 'Position',
            'created_at' => 'Created at',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForums()
    {
        return $this->hasMany(Forum::className(), ['category_id' => 'id']);
    }
    public function getCountForums()
    {
        return $this->hasMany(Forum::className(), ['category_id' => 'id'])->count();
    }
    public function getCountCategories(){
        return $this->find()->count();
    }
    
    public function getCountAllCategories(){
        
        $categoriesList=[];
        
        $categories=  Category::find()->all();
        foreach ($categories as $category){
        
            
            $categoriesList+=[$category->id=>$category->countForums];
            
        }
        return $categoriesList;
        
        
    }
    
        public function getAllCategories(){
        
        $categoriesList=[];
        
        $categories=  Category::find()->orderBy("id")->all();
        foreach ($categories as $category){
            
            $categoriesList+=[$category->id=>$category->title];
            
        }
        return $categoriesList;
        
        
    }
    

        public function beforeSave($insert) {
         if (parent::beforeSave($insert)) {
             if($this->isNewRecord){

             if($this->position<=$this->getCountCategories()){
                 
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
