package com.test;

import java.util.Random;

import com.bqueue.BlockingQueue;

public class Producer implements Runnable{
	BlockingQueue bQueue;
	Random rand = new Random();
	public Producer(BlockingQueue bQueue) {
		this.bQueue = bQueue;
	}

	@Override
	public void run() {
		while(true) {
			int x = rand.nextInt();
			try {
				bQueue.push(x);
				//Thread.sleep(rand.nextInt(200));
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
}
