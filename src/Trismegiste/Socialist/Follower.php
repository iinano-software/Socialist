<?php

/*
 * Socialist
 */

namespace Trismegiste\Socialist;

/**
 * Follower is a contract for a follower who follows other followers
 */
interface Follower
{

    /**
     * @todo Perhaps using the same technique in Famous interface ?
     */
    public function getUniqueId();

    /**
     * Follows one guy (idempotent)
     * 
     * @param \Trismegiste\Socialist\Follower $f
     */
    public function follow(Follower $f);

    /**
     * Unfollows one guy
     * 
     * @param \Trismegiste\Socialist\Follower $f
     */
    public function unfollow(Follower $f);

    /**
     * Is this guy following anoher guy
     * 
     * @param \Trismegiste\Socialist\Follower $f
     * 
     * @return boolean
     */
    public function isFollowing(Follower $f);

    /**
     * How many other guys this guy is following ?
     * 
     * @return int
     */
    public function getFollowedCount();

    /**
     * How many followers for this guy ?
     * (Cached with map-reduce)
     * 
     * @return int
     */
    public function getFollowerCount();

    /**
     * Returns the minimal information for a follower (optim)
     * 
     * @param \Trismegiste\Socialist\Follower $f
     * 
     * return object
     */
    public function getMinimalInfo();
}