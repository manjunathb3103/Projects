package com.test;

import java.util.Random;

import com.bqueue.BlockingQueue;

public class Consumer implements Runnable{ 
	BlockingQueue bQueue;
	Random rand = new Random();
	public Consumer(BlockingQueue bQueue) {
		this.bQueue = bQueue;
	}

	@Override
	public void run() {
		while(true) {
			try {
				bQueue.poll();
				//Thread.sleep(rand.nextInt(200));
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}			
		}
	}
}
