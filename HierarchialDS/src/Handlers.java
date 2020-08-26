import java.util.*;

public class Handlers {
	static Node root = new Node("root", "");

	public static void createNode(String data, String path) {
		if (path.equals("root"))
			root.data = data;
		else {
			String[] pathArray = path.split("/");
			Node temp = new Node(pathArray[pathArray.length - 1], data);
			Node newNode = null;
			for (int i = 1; i < pathArray.length; i++) {
				if (i == 1)
					newNode = root;
				else
					newNode = newNode.getNode(pathArray[i]);
			}
			newNode.addChild(temp);
		}
	}

	public static void updateNode(String data, String path) {
		if (path.equals("root"))
			root.data = data;
		else {
			String[] pathArray = path.split("/");
			Node newNode = null;
			for (int i = 1; i < pathArray.length; i++) {
				if (i == 1)
					newNode = root;
				else {
					newNode = newNode.getNode(pathArray[i]);
				}
			}
			newNode.data = data;
		}
	}

	public static void deleteNode(String path) {
		if (path.equals("root"))
			root = null;
		else {
			String[] pathArray = path.split("/");
			Node newNode = null;
			for (int i = 1; i < pathArray.length; i++) {
				if (i == 1)
					newNode = root;
				else {
					newNode = newNode.getNode(pathArray[i]);
				}
			}
			newNode = null;
		}
	}

	public static String getData(String path) {
		if (path.equals("root"))
			return root.data;
		else {
			String[] pathArray = path.split("/");
			Node newNode = null;
			for (int i = 1; i < pathArray.length; i++) {
				if (i == 1)
					newNode = root;
				else {
					newNode = newNode.getNode(pathArray[i]);
				}
			}
			return newNode.data;
		}
	}

	public static Set<String> listChild(String path) {
		Set<String> child = new TreeSet<>();
		if (path.equals("root")) {
			child = root.child.keySet();
		} else {
			String[] pathArray = path.split("/");
			Node newNode = null;
			for (int i = 1; i < pathArray.length; i++) {
				if (i == 1)
					newNode = root;
				else {
					newNode = newNode.getNode(pathArray[i]);
				}
			}
			child = newNode.child.keySet();
		}
		return child;
	}

}
