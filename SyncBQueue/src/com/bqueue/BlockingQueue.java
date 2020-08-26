package com.bqueue;

import java.util.LinkedList;
import java.util.Queue;

public class BlockingQueue {
	private Queue<Integer> queue;
	private int max = 20;
	
	public BlockingQueue(int size) {
		queue = new LinkedList<Integer>();
		this.max = size;
	}
	
	public synchronized void push(Integer e) throws InterruptedException {
		
		while (queue.size() == max) {
			String msg = "ERROR: Thread: " + Thread.currentThread().getId() + " waiting to push";
			System.out.println(msg);
			wait();
		}
		queue.add(e);
		System.out.println("Thread: " + Thread.currentThread().getId() + " Pushed " + e);
		notifyAll();
	}
	
	public synchronized Integer poll() throws InterruptedException {
		while (queue.size() == 0) {
			String msg = "ERROR:Thread: " + Thread.currentThread().getId() + " waiting to poll";
			System.out.println(msg);
			wait();
		}
		Integer e = queue.remove();
		System.out.println("Thread: " + Thread.currentThread().getId() + " Polled " + e);
		notifyAll();
		return e;
	}
}
