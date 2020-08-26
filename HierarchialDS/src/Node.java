import java.util.*;

public class Node {
	String data;
	String Name;
	Map<String, Node> child;
	String listener;
	
	public Node(String Name, String data)
	{
		this.Name = Name;
		this.data = data;
		child = new HashMap<String,Node>();
	}
	
	public Node getNode(String Name)
	{
		if (this.child.containsKey(Name))
			{
				return this.child.get(Name);
			}
		return null;
	}
	
	public void addChild(Node newChild)
	{
		this.child.put(newChild.Name, newChild);
	}
}
