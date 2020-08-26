import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Set;

/**
 * The Following class will manange the Heirarchial Data Store
 * 
 * @author ManjunathB
 *
 */
public class HierarchialDS {

	/**
	 * The main method
	 * 
	 * @param args
	 * @throws IOException
	 */
	public static void main(String[] args) throws IOException {
		while (true) {
			//Display Options
			System.out.println("Select the Operation\n" 
							+ "1. Create Node\n" 
							+ "2. Delete Node\n" 
							+ "3. Update Node\n"
							+ "4. List Children of a Node\n" 
							+ "5. Get Data of a Node\n" 
							+ "6. exit");
			
			BufferedReader obj = new BufferedReader(new InputStreamReader(System.in));
			
			int choice = Integer.parseInt(obj.readLine());

			// Declaring variables used in switch statement
			String path; // Customer ID
			String data;
			switch (choice) {
				case 1:
					System.out.println("Enter the path\n");
					path = obj.readLine();
					System.out.println("Enter the data\n");
					data = obj.readLine();
					Handlers.createNode(data, path);
					break;
				case 2:
					System.out.println("Enter the path of the node to be deleted\n");
					path = obj.readLine();
					Handlers.deleteNode(path);
					break;
				case 3:
					System.out.println("Enter the path\n");
					path = obj.readLine();
					System.out.println("Enter the data");
					data = obj.readLine();
					Handlers.updateNode(data, path);
					break;
				case 4:
					Set<String> children = null;
					System.out.println("Enter the path\n");
					path = obj.readLine();
					children = Handlers.listChild(path);
					for (String child : children) {
						System.out.print(child + "\n");
					}
					break;
				case 5:
					System.out.println("Enter the path\n");
					path = obj.readLine();
					data = Handlers.getData(path);
					System.out.print(data + "\n");
					break;
				case 6:
					return;
				default:
					System.out.println("Invalid Option\n");
					break;
				}
		}
	}

}
