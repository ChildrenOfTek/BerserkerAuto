<?php

namespace ForumBundle\Entity;
use ForumBundle\Entity\Comment;
use MemberBundle\Entity\Member;


use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="MemberBundle\Entity\User", inversedBy="post")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    private $user;
    /**
     * @var int
     *
     * @ORM\Column(name="comment", type="integer")
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set member
     *
     * @param integer $member
     *
     * @return Post
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return int
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}

