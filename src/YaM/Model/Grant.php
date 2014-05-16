<?php


namespace YaM\Model;


use YaM\Core\Model;

class Grant extends Model
{

    const PERM_PUBLIC_STAT = 'public_stat';
    const PERM_VIEW = 'view';
    const PERM_EDIT = 'edit';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $perm;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPerm()
    {
        return $this->perm;
    }

    /**
     * @param string $perm
     */
    public function setPerm($perm)
    {
        $this->perm = $perm;
    }


} 