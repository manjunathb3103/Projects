package com.test;

import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

import com.bqueue.BlockingQueue;

public class Tester {
	static int MAX_T = 100;
	
	public static void main(String args[]) throws InterruptedException {
		BlockingQueue bQueue = new BlockingQueue(6);
		Runnable r1 = new Producer(bQueue);
		Runnable r2 = new Consumer(bQueue);
		ExecutorService pool = Executors.newFixedThreadPool(MAX_T); 
		
		for (int i=0; i<100; i++) {
			if (i%2 != 0) {
				pool.execute(r1);
			}
			else {
				pool.execute(r2);
			}
		}
		pool.shutdown();

	}
}